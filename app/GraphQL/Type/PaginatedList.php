<?php

namespace Example\GraphQL\Type;

use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\TypeInterface;

class PaginatedList extends AbstractObjectType
{
    /**
     * @var TypeInterface
     */
    private $itemType;

    public function __construct($itemType)
    {
        $this->itemType = $itemType;

        parent::__construct();
    }

    public function getItemType()
    {
        return $this->itemType;
    }

    public function getName()
    {
        return 'paginated';
    }

    public function build($config)
    {
        $config
            ->addFields([
                'items' => new ListType($this->itemType),
                'pageInfo' => new PageInfoType(),
            ]);
    }
}
