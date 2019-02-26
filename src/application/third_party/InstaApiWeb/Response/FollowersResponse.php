<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace InstaApiWeb\Responses{    
  
  require_once config_item('thirdparty-response-class');

  use InstaApiWeb\Response\Response;

  /**
   * Description of FollowersResponse
   *
   * @author jose
   */
  class FollowersResponse extends Response {

    public $FollowersCollection;

    public $Cursor;

    public $HasNextPage;
    
     public function __construct(array $followersCollection, string $cursor = null, bool $hasNextPage, int $code = 0, string $message = '')
     {
         parent::__construct($code, $message);

            $this->FollowersCollection = $followersCollection;
            $this->Cursor = $cursor;
            $this->HasNextPage = $hasNextPage;

            $this->output_array = array(
                'Verify_link' => $followersCollection,
                'Cursor' => $cursor,
                'Has_Next_Page' => $hasNextPage
            );
     }
  }
}