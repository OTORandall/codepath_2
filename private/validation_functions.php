<?php

  // custom validation
  function is_valid_name($name=''){
    // here I match all the valid from the beginning of
    // the string to the end of the string.
    // the match will fail when there is invalid char
    // between the beginning and the end
    $pattern='/^[A-Za-z0-9 _]+$/';
    $result = preg_match($pattern, $name, $match);
    if($result){
      //  true mean there is not valid input
      return true;
    }
    else{
      false;
    }
  }

  // custom validations
  function is_valid_phone($phone=''){
    $pattern = '/^[0-9 ()-]+$/';
    $result = preg_match($pattern, $phone, $match);
    if($result){
      return true;
    }
    else{
      return false;
    }

  }

  // custom validations
  function is_valid_code($code=''){
    // code onlu consists of upper case characters
    $pattern = '/^[A-Z]+$/';
    $result = preg_match($pattern, $code, $match);
    if($result){
      return true;
    }
    else {
      return false;
    }
  }

  // custom validations
  function is_valid_state_id($state_id){
    $pattern = '/^[0-9]+$/';
    $result = preg_match($pattern, $state_id, $match);
    if($result){
      return true;
    }
    else {
      return false;
    }
  }

  // might not need this function
  function is_valid_country_id($country_id){
    $pattern = '/^[0-9]+$/';
    $result = preg_match($pattern, $country_id, $match);
    if($result){
      return true;
    }
    else {
      return false;
    }
  }
  // custom validations
  function is_valid_position($position){
    $pattern = '/^[0-9]+$/';
    $result = preg_match($pattern, $position, $match);
    if($result){
      return true;
    }
    else{
      return false;
    }
  }

  function is_valid_response($response){
    $pattern='/^[yYnN]$/';
    $result = preg_match($pattern, $response, $match);
    if($result){
      return true;
    }
    else{
      return false;
    }
  }



  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Function can be improved later to check for
    // more than just '@'.
    $result = preg_match('/^[A-Za-z0-9-_]+[@.]+[A-Za-z0-9-_]+\.com$/', $value, $match);
    if($result) {
      return true;
    }
    else{
      return false;
    }
    //return strpos($value, '@') !== false;
  }

?>
