<?php declare(strict_types = 1);

return array (
  'c1d80171599f1cae698d836736414c94' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
    ),
     'methodTags' => 
    array (
    ),
     'propertyTags' => 
    array (
    ),
     'paramTags' => 
    array (
      'paginator' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Knp\\Component\\Pager\\PaginatorInterface',
        )),
         'isVariadic' => false,
      )),
      'articleRepository' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Repository\\ArticleRepository',
        )),
         'isVariadic' => false,
      )),
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\ObjectType::__set_state(array(
         'className' => 'Symfony\\Component\\HttpFoundation\\Response',
      )),
    )),
     'throwsTag' => 
    PHPStan\PhpDoc\Tag\ThrowsTag::__set_state(array(
       'type' => 
      PHPStan\Type\UnionType::__set_state(array(
         'types' => 
        array (
          0 => 
          PHPStan\Type\ObjectType::__set_state(array(
             'className' => 'Doctrine\\ORM\\NonUniqueResultException',
          )),
          1 => 
          PHPStan\Type\ObjectType::__set_state(array(
             'className' => 'Doctrine\\ORM\\NoResultException',
          )),
        ),
      )),
    )),
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  '2a0b1342cc3983503654eadad39a26ac' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
    ),
     'methodTags' => 
    array (
    ),
     'propertyTags' => 
    array (
    ),
     'paramTags' => 
    array (
      'request' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Component\\HttpFoundation\\Request',
        )),
         'isVariadic' => false,
      )),
      'paginator' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Knp\\Component\\Pager\\PaginatorInterface',
        )),
         'isVariadic' => false,
      )),
      'articleRepository' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Repository\\ArticleRepository',
        )),
         'isVariadic' => false,
      )),
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\ObjectType::__set_state(array(
         'className' => 'Symfony\\Component\\HttpFoundation\\JsonResponse',
      )),
    )),
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  'fe7d2d3e4fc790b67984b6ca38c371bb' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
      'articles' => 
      PHPStan\PhpDoc\Tag\VarTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Knp\\Component\\Pager\\Pagination\\SlidingPagination',
        )),
      )),
    ),
     'methodTags' => 
    array (
    ),
     'propertyTags' => 
    array (
    ),
     'paramTags' => 
    array (
    ),
     'returnTag' => NULL,
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
);