<?php

namespace App\Helpers;

class SerpApi
{
    private $serp_api_host = "http://localhost:8080";
    private int $faculty_id;
    private ?array $author_response = null;

    public function __construct(int $faculty_id){
        $this->faculty_id = $faculty_id;
    }
    protected function request($method = 'GET'): array{
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->serp_api_host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => []
        ));

        $response = curl_exec($curl);

        $response = json_decode($response, true);

        return $response;
    }

    public function author_request(): array{
        if($this->author_response){
            return $this->author_response;
        }

        $author_response = $this->request();
        $this->author_response = $author_response;

        return $author_response;
    }
    public function get_articles(): array{
        $response = $this->author_request();

        $articles = array_map(function($article){
            return [
                "title" => $article["title"],
                "link" => $article["link"],
                "published_year" => $article["year"],
                "citation_id" => $article["citation_id"],
                "faculty_id" => $this->faculty_id
            ];

        }, $response['articles']);

        return $articles;
    }

    public function get_article_citations(): array{
        $response = $this->author_request();

        $article_citation = array_map(function($article){
            return [
                "citation_id" => $article['citation_id'],
                "citation_year" => $article['year'],
                "citation_count" => $article['cited_by']['value'],
            ];

        }, $response['articles']);

        return $article_citation;
    }

    public function get_faculty_citations(): array{
        $response = $this->author_request();

        $faculty_citation = [
            "g_total_citation" => $response['cited_by']['table'][0]['citations']['all'],
            "g_h_index" => $response['cited_by']['table'][1]['h_index']['all'],
            "g_i10" => $response['cited_by']['table'][2]['i10_index']['all'],
            "faculty_id" => $this->faculty_id
        ];

        return $faculty_citation;
    }
}
