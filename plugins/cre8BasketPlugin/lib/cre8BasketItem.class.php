<?php

class cre8BasketItem
{
  private
    $quantity         = 0,
    $price            = 0,
    $discount         = 0,
    $weight           = 0,
    $class            = '',
    $id               = 0,
    $parameter_holder = null;

  /**
   * Constructs a new item to store in the basket.
   *
   * @param  string class of this item
   * @param  integer unique identifier of this item
   */
  public function __construct($class, $id)
  {
    $this->class            = $class;
    $this->id               = $id;
    $this->parameter_holder = new sfParameterHolder();
  }

  /**
   * Returns unique identifier for this item.
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Sets unique identifier for this item.
   *
   * @param integer
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * Returns class of this item.
   *
   * @return string
   */
  public function getClass()
  {
    return $this->class;
  }

  /**
   * Sets class of this item.
   *
   * @param string
   */
  public function setClass($class)
  {
    $this->class = $class;
  }

  /**
   * Returns price.
   *
   * @return float
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Sets price.
   *
   * @param float
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }

  /**
   * Returns basket.
   *
   * @return float
   */
  public function getBasket()
  {
    return $this->basket;
  }

  /**
   * Sets basket for this item.
   *
   * @param float
   */
  public function setBasket($basket)
  {
    $this->basket = $basket;
  }

  /**
   * Returns weight.
   *
   * @return float
   */
  public function getWeight()
  {
    return $this->weight;
  }

  /**
   * Sets weight.
   *
   * @param float
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }

  /**
   * Returns discount to apply for this item.
   *
   * @return integer percentage of dicount to apply between 0 and 100
   */
  public function getDiscount()
  {
    return $this->discount;
  }

  /**
   * Sets quantity.
   *
   * @param integer
   */
  public function setDiscount($discount)
  {
    $this->discount = $discount;
  }

  /**
   * Returns quantity.
   *
   * @return integer
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

  /**
   * Updates quantity.
   *
   * If $quantity is 0, this item will be automatically deleted from shopping cart.
   *
   * @param integer
   */
  public function setQuantity($quantity)
  {
    if (!preg_match('~^\d+$~', $quantity))
    {
      $this->quantity = 1;
    }
    else
    {
      $this->quantity = $quantity;
    }
  }

  /**
   * Adds quantity to the actual one.
   *
   * @param  integer
   */
  public function addQuantity($quantity)
  {
    $this->quantity += $quantity;
  }

  public function getParameterHolder()
  {
    return $this->parameter_holder;
  }

  public function getParameter($name, $default = null, $ns = null)
  {
    return $this->parameter_holder->get($name, $default, $ns);
  }

  public function hasParameter($name, $ns = null)
  {
    return $this->parameter_holder->has($name, $ns);
  }

  public function setParameter($name, $value, $ns = null)
  {
    return $this->parameter_holder->set($name, $value, $ns);
  }
}

?>