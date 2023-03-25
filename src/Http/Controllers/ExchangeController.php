<?php
namespace Buckhill\Exchange\Http\Controllers;

use App\Http\Controllers\Controller;
use Buckhill\Exchange\Http\Service\ExchangeService;
use Exception;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * @var ExchangeService
     */
    protected $exchangeService;

    public function __construct(ExchangeService $exchangeService)
    {
        $this->exchangeService = $exchangeService;

    }

    /**
     * This invoke method calls the ExchangeService
     *
     * @param Request $request
     *
     * @return array
     *
     * @throws Exception
     */
    public function __invoke(Request $request)
    {
        if (empty($request['amount']) || empty($request['currency'])) {
            throw new Exception('Amount and Currency is required');
        }

        return $this->exchangeService->getExchangeRate($request->all());

    }
}
