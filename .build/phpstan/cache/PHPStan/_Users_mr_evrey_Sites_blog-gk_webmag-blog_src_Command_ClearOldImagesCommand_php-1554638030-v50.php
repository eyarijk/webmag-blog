<?php declare(strict_types = 1);

return array (
  'd1b33021cb6b0a0babe9ebfa03760afd' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
      0 => 
      PHPStan\PhpDoc\Tag\VarTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Repository\\ArticleImageRepository',
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
  'c3ad73e99d0bbccff5e602294075b720' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
      0 => 
      PHPStan\PhpDoc\Tag\VarTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Doctrine\\ORM\\EntityManagerInterface',
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
  'b87ac6638a1236e69af30919982c585c' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
      0 => 
      PHPStan\PhpDoc\Tag\VarTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Service\\ImageRemove',
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
  '78e01a16cc48194c3f941e0aed37f23a' => 
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
      'em' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Doctrine\\ORM\\EntityManagerInterface',
        )),
         'isVariadic' => false,
      )),
      'articleImageRepository' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Repository\\ArticleImageRepository',
        )),
         'isVariadic' => false,
      )),
      'imageRemove' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Service\\ImageRemove',
        )),
         'isVariadic' => false,
      )),
    ),
     'returnTag' => NULL,
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  '24508f889ff986ff69270ec185959ace' => 
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
      'input' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Component\\Console\\Input\\InputInterface',
        )),
         'isVariadic' => false,
      )),
      'output' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Component\\Console\\Output\\OutputInterface',
        )),
         'isVariadic' => false,
      )),
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\UnionType::__set_state(array(
         'types' => 
        array (
          0 => 
          PHPStan\Type\IntegerType::__set_state(array(
          )),
          1 => 
          PHPStan\Type\VoidType::__set_state(array(
          )),
          2 => 
          PHPStan\Type\NullType::__set_state(array(
          )),
        ),
      )),
    )),
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  'db0cd6cb281e1352146f02fcda67fd7d' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
      'useLessImages' => 
      PHPStan\PhpDoc\Tag\VarTag::__set_state(array(
         'type' => 
        PHPStan\Type\ArrayType::__set_state(array(
           'keyType' => 
          PHPStan\Type\MixedType::__set_state(array(
             'isExplicitMixed' => false,
          )),
           'itemType' => 
          PHPStan\Type\ArrayType::__set_state(array(
             'keyType' => 
            PHPStan\Type\MixedType::__set_state(array(
               'isExplicitMixed' => false,
            )),
             'itemType' => 
            PHPStan\Type\ObjectType::__set_state(array(
               'className' => 'App\\Entity\\ArticleImage',
            )),
          )),
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