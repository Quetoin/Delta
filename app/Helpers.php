<?php


function getPrice($price){

  dd(floatval($price));
  return number_format($price,2,','," ")

}