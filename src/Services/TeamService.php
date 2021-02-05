<?php

namespace App\Services;

use App\Repository\TeamRepository;

class TeamService{

    private $teamrepository;
    public function __construct(TeamRepository $teamRepository){

        $this->teamRepository=$teamRepository;
    }
    public function teams(){

        return $this->teamRepository->findAll();

    }
}