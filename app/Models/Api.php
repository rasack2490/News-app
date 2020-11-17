<?php

namespace App\Models;


use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    public function getNews($source){
        try {
            $client = new GuzzleHttpClient();
            $apiRequest = $client->request('GET', 'https://newsapi.org/v1/articles?source='.$source.'&sortBy=top&apiKey=a6a24f22afe3490f8751e201ae10f417');
            $content = json_decode($apiRequest->getBody()->getContents(), true);
            return $content['articles'];
        }catch (RequestException $e){
            echo Psr7\str($e->getRequest());
            if($e->hasResponse()){
                echo Psr7\str($e->getResponse());
            }
        }
    }

    public function getAllSources(){

        try{
            $client = new GuzzleHttpClient();
            $apiRequest = $client->request('GET', 'https://newsapi.org/v1/sources?language=fr');
            $content = json_decode($apiRequest->getBody()->getContents(), true);
            return $content['sources'];
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if($e->hasResponse()){
                echo Psr7\str($e->getResponse());
            }
        }
    }
}
