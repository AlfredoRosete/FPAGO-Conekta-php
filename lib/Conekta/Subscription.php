<?php

class Subscription extends Resource
{
  public function instanceUrl()
  {
    $this->apiVersion = Conekta::$apiVersion;
    $id = $this->id;
    parent::idValidator($id);
    $class = get_class($this);
    $base = '/subscription';
    $customerUrl = $this->customer->instanceUrl();
    
    return $customerUrl . $base;
  }

  public function update($params = null)
  {
    return parent::_update($params);
  }

  public function cancel()
  {
    return parent::_customAction('post', 'cancel');
  }

  public function pause()
  {
    return parent::_customAction('post', 'pause');
  }

  public function resume()
  {
    return parent::_customAction('post', 'resume');
  }
}
