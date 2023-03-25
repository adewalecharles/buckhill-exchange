<?php
namespace Buckhill\Exchange\Http\Service;

use Buckhill\Exchange\Http\Exceptions\InvalidAmountException;
use Buckhill\Exchange\Http\Exceptions\InvalidContentException;
use Buckhill\Exchange\Http\Exceptions\InvalidCurrencyException;
use DOMDocument;
use GuzzleHttp\Client;

class ExchangeService
{
    /**
     * get the currency change rate based on currency and amount passed
     *
     * @param array $valid
     *
     * @return array
     *
     * @throws InvalidContentException
     * @throws InvalidCurrencyException
     * @throws InvalidAmountException
     */
    public function getExchangeRate(array $valid)
    {
        $content = $this->readXmlContent();

        //if content is empty, then we couldnt read the eu rate website, we will throw an exception
        if (empty($content)) {
            throw new InvalidContentException('Could not read the current exchange rate');
        }

        //check if user passed a valid currency
        if (!in_array($valid['currency'], array_column($content, "currency"))) {
            throw new InvalidCurrencyException($valid['currency'].' is not a valid currency, read our doc for list of valid currency');
        }

        //check if user passed a valid amount
        if ($valid['amount'] < 1) {
            throw new InvalidAmountException($valid['amount'].' is not a valid amount, you must pass a minimum of 1');
        }

        // get the needed array of rates from the dimensional arrays
        $currentCurrencyArray =  $this->searchArray($content, 'currency', $valid['currency']);

        return  [
            'amount' => $valid['amount'],
            'currency' => $valid['currency'],
            'exchange_rate' => $currentCurrencyArray['rate'],
            'converted_amount' => $valid['amount'] * $currentCurrencyArray['rate'],
        ];
    }

    /**
     * Read the content of the xml into an array
     *
     * @return array $data
     */
    private function readXmlContent():array
    {

        $data = [];
        $url = "https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml";
        $xmlRaw = file_get_contents($url);

        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = FALSE;

        $doc->loadXML($xmlRaw);

        $firstNode = $doc->getElementsByTagName('Cube')->item(0);
        foreach ($firstNode->childNodes as $secondNode) {
            $value = [];
            foreach ($secondNode->childNodes as $thirdNode) {
                $value['date'] = $secondNode->getAttribute('time');
                $value['currency'] = $thirdNode->getAttribute('currency');
                $value['rate'] = $thirdNode->getAttribute('rate');
                $data[] = $value;
                unset($value);
            }
        }

        return $data;

    }

    /**
     * search through the array and return the array that has the current currency
     *
     * @param array $array
     * @param string $key
     * @param string $key
     *
     * @return array|null
     *
     */
    private function searchArray($array, $key, $value):array|null
    {
        foreach ($array as $subarray) {
            if ($subarray[$key] === $value) {
                return $subarray;
            }
        }
        return null;
    }
}
