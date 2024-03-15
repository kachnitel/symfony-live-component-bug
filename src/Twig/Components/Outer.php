<?php

namespace App\Twig\Components;

use App\Subject;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Outer
{
    use DefaultActionTrait;

    #[LiveProp(hydrateWith: 'hydrateItems', dehydrateWith: 'dehydrateItems')]
    public array $items;

    public function __construct()
    {
        $this->items =  [
            new Subject(1, 'item1'),
            new Subject(2, 'item2'),
            new Subject(3, 'item3')
        ];
    }

    public function getOtherItems(): array
    {
        return [
            new Subject(4, 'item4'),
            new Subject(5, 'item5'),
            new Subject(6, 'item6')
        ];
    }

    #[LiveAction]
    public function updateItems(): void
    {
        $this->items[0]->setName('updated item1');
    }

    public function dehydrateItems(array $items): array
    {
        return array_map(fn(Subject $item) => ['id' => $item->getId(), 'name' => $item->getName()], $items);
    }

    public function hydrateItems(array $items): array
    {
        return array_map(fn(array $item) => new Subject($item['id'], $item['name']), $items);
    }
}
