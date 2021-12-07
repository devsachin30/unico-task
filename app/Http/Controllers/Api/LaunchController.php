<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LaunchController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $params = $request->all();
            $limit = $params['limit'] ?? 10;
            $page = $params['page'] ?? 1;
            $queryParams = [
                'limit' => $limit,
                'offset' => ($page - 1) * $limit,
                'order' => $params['order'] ?? 'desc'
            ];
            $client = new Client();
            $response = $client->get(
                'https://api.spacexdata.com/v3/launches',
                [ 'query' => $queryParams]
            );
            if ($response->getStatusCode() != 200) {
                throw new Exception('Something wen wrong!');
            }
            $data = json_decode($response->getBody(), true);
            return response()->json(
                [
                    'success' => true,
                    'data' => $data,
                    'error' => ''
                ]
            );
        } catch(Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'data' => [],
                    'error' => $e->getMessage()
                ]
            );
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
