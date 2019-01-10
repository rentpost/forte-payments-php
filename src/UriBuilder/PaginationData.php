<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\UriBuilder;

use Rentpost\ForteApi\ValidatingSerializer\ValidatableSerializableInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#filters
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class PaginationData implements ValidatableSerializableInterface
{

    /**
     * @var string
     * @Assert\Choice({"asc","desc"})
     */
    protected $order_direction;

    /** @var string */
    protected $order_field;

    /**
     * @var int
     * @Assert\Range(min=50, max=1000)
     */
    protected $page_size;

    /**
     * @var int
     * @Assert\Range(min=0)
     */
    protected $page_index;


    /**
     * @internal this getter is intended to be called by the serializer
     *
     * @return string
     */
    public function getOrderby(): ?string
    {
        if ($this->order_field) {
            $orderby = $this->order_field;
            if ($this->order_direction) {
                $orderby .= ' ' . $this->order_direction;
            }

            return $orderby;
        }

        return null;
    }


    /**
     * Sets the order by details
     *
     * @param string $field
     * @param string $direction
     */
    public function setOrderby(string $field, string $direction): self
    {
        $this->order_field = $field;
        $this->order_direction = strtolower($direction);

        return $this;
    }


    /**
     * Gets the page size
     */
    public function getPageSize(): ?int
    {
        return $this->page_size;
    }


    /**
     * Sets the page size
     *
     * @param int $page_size
     */
    public function setPageSize(int $page_size): self
    {
        $this->page_size = $page_size;

        return $this;
    }


    /**
     * Gets the page index
     */
    public function getPageIndex(): ?int
    {
        return $this->page_index;
    }


    /**
     * Sets the page index
     * 
     * @param int $page_index
     */
    public function setPageIndex(int $page_index): self
    {
        $this->page_index = $page_index;

        return $this;
    }
}
