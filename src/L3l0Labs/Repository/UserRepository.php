<?php

namespace L3l0Labs\Repository;

interface UserRepository
{
    public function findOneByEmail($email);
} 