<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    
    public function test_initial()
    {
        $response = $this->get('http://localhost:8000/');

        $response->assertStatus(200);
    }

    public function test_products()
    {
        $response = $this->get('http://localhost:8000/api/showproducts');

        $response->assertStatus(200);
    }    

    public function test_feedbacks()
    {
        $response = $this->get('http://localhost:8000/api/feedbacks');

        $response->assertStatus(200);
    } 
   
}
