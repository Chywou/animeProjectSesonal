<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DayRepository::class)
 */
class Search
{
    /**
     * @var string|null
     */
 private $searchString;

 /**
  * Get the value of searchString
  *
  * @return  string|null
  */ 
 public function getSearchString()
 {
  return $this->searchString;
 }

 /**
  * Set the value of searchString
  *
  * @param  string|null  $searchString
  *
  * @return  self
  */ 
 public function setSearchString($searchString)
 {
  $this->searchString = $searchString;

  return $this;
 }
}