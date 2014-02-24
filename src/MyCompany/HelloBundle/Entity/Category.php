<?php

namespace MyCompany\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MyCompany\HelloBundle\Entity\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MyCompany\HelloBundle\Entity\Product", mappedBy="category")
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct() {
        $this->products = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Products
     *
     * @param ArrayCollection $products products
     * @return mixed
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * Get Products
     *
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add product
     * @param Product $product
     */
    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    /**
     * Remove product
     * @param Product $product
     */
    public function removeProduct($product) {
        $this->products->removeElement($product);
    }
}
