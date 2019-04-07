<?php declare(strict_types = 1);

return array (
  '4990043c5ab150e7d99d104f4e40f764' => 
  PHPStan\PhpDoc\ResolvedPhpDocBlock::__set_state(array(
     'varTags' => 
    array (
    ),
     'methodTags' => 
    array (
      'find' => 
      PHPStan\PhpDoc\Tag\MethodTag::__set_state(array(
         'returnType' => 
        PHPStan\Type\UnionType::__set_state(array(
           'types' => 
          array (
            0 => 
            PHPStan\Type\ObjectType::__set_state(array(
               'className' => 'App\\Entity\\Category',
            )),
            1 => 
            PHPStan\Type\NullType::__set_state(array(
            )),
          ),
        )),
         'isStatic' => false,
         'parameters' => 
        array (
          'id' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\MixedType::__set_state(array(
               'isExplicitMixed' => false,
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => false,
             'isVariadic' => false,
          )),
          'lockMode' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\MixedType::__set_state(array(
               'isExplicitMixed' => false,
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => true,
             'isVariadic' => false,
          )),
          'lockVersion' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\MixedType::__set_state(array(
               'isExplicitMixed' => false,
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => true,
             'isVariadic' => false,
          )),
        ),
      )),
      'findOneBy' => 
      PHPStan\PhpDoc\Tag\MethodTag::__set_state(array(
         'returnType' => 
        PHPStan\Type\UnionType::__set_state(array(
           'types' => 
          array (
            0 => 
            PHPStan\Type\ObjectType::__set_state(array(
               'className' => 'App\\Entity\\Category',
            )),
            1 => 
            PHPStan\Type\NullType::__set_state(array(
            )),
          ),
        )),
         'isStatic' => false,
         'parameters' => 
        array (
          'criteria' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\ArrayType::__set_state(array(
               'keyType' => 
              PHPStan\Type\MixedType::__set_state(array(
                 'isExplicitMixed' => true,
              )),
               'itemType' => 
              PHPStan\Type\MixedType::__set_state(array(
                 'isExplicitMixed' => true,
              )),
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => false,
             'isVariadic' => false,
          )),
          'orderBy' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\UnionType::__set_state(array(
               'types' => 
              array (
                0 => 
                PHPStan\Type\ArrayType::__set_state(array(
                   'keyType' => 
                  PHPStan\Type\MixedType::__set_state(array(
                     'isExplicitMixed' => true,
                  )),
                   'itemType' => 
                  PHPStan\Type\MixedType::__set_state(array(
                     'isExplicitMixed' => true,
                  )),
                )),
                1 => 
                PHPStan\Type\NullType::__set_state(array(
                )),
              ),
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => true,
             'isVariadic' => false,
          )),
        ),
      )),
      'findAll' => 
      PHPStan\PhpDoc\Tag\MethodTag::__set_state(array(
         'returnType' => 
        PHPStan\Type\ArrayType::__set_state(array(
           'keyType' => 
          PHPStan\Type\MixedType::__set_state(array(
             'isExplicitMixed' => false,
          )),
           'itemType' => 
          PHPStan\Type\ObjectType::__set_state(array(
             'className' => 'App\\Entity\\Category',
          )),
        )),
         'isStatic' => false,
         'parameters' => 
        array (
        ),
      )),
      'findBy' => 
      PHPStan\PhpDoc\Tag\MethodTag::__set_state(array(
         'returnType' => 
        PHPStan\Type\ArrayType::__set_state(array(
           'keyType' => 
          PHPStan\Type\MixedType::__set_state(array(
             'isExplicitMixed' => false,
          )),
           'itemType' => 
          PHPStan\Type\ObjectType::__set_state(array(
             'className' => 'App\\Entity\\Category',
          )),
        )),
         'isStatic' => false,
         'parameters' => 
        array (
          'criteria' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\ArrayType::__set_state(array(
               'keyType' => 
              PHPStan\Type\MixedType::__set_state(array(
                 'isExplicitMixed' => true,
              )),
               'itemType' => 
              PHPStan\Type\MixedType::__set_state(array(
                 'isExplicitMixed' => true,
              )),
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => false,
             'isVariadic' => false,
          )),
          'orderBy' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\UnionType::__set_state(array(
               'types' => 
              array (
                0 => 
                PHPStan\Type\ArrayType::__set_state(array(
                   'keyType' => 
                  PHPStan\Type\MixedType::__set_state(array(
                     'isExplicitMixed' => true,
                  )),
                   'itemType' => 
                  PHPStan\Type\MixedType::__set_state(array(
                     'isExplicitMixed' => true,
                  )),
                )),
                1 => 
                PHPStan\Type\NullType::__set_state(array(
                )),
              ),
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => true,
             'isVariadic' => false,
          )),
          'limit' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\MixedType::__set_state(array(
               'isExplicitMixed' => false,
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => true,
             'isVariadic' => false,
          )),
          'offset' => 
          PHPStan\PhpDoc\Tag\MethodTagParameter::__set_state(array(
             'type' => 
            PHPStan\Type\MixedType::__set_state(array(
               'isExplicitMixed' => false,
            )),
             'passedByReference' => 
            PHPStan\Reflection\PassedByReference::__set_state(array(
               'value' => 1,
            )),
             'isOptional' => true,
             'isVariadic' => false,
          )),
        ),
      )),
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
  'b764785f4cc1b497e3196524ba2ceebb' => 
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
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\ObjectType::__set_state(array(
         'className' => 'Doctrine\\ORM\\Query',
      )),
    )),
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  '86ae47cb26bb596f03a03239a2e5ab53' => 
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
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\ArrayType::__set_state(array(
         'keyType' => 
        PHPStan\Type\MixedType::__set_state(array(
           'isExplicitMixed' => true,
        )),
         'itemType' => 
        PHPStan\Type\MixedType::__set_state(array(
           'isExplicitMixed' => true,
        )),
      )),
    )),
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  '25880825243f854212e2478e7ac1d29d' => 
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
      'slug' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\StringType::__set_state(array(
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
          PHPStan\Type\ObjectType::__set_state(array(
             'className' => 'App\\Entity\\Category',
          )),
          1 => 
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
  'd905b3a1ca582f282e7f8ded3690585a' => 
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
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\IterableType::__set_state(array(
         'keyType' => 
        PHPStan\Type\MixedType::__set_state(array(
           'isExplicitMixed' => true,
        )),
         'itemType' => 
        PHPStan\Type\MixedType::__set_state(array(
           'isExplicitMixed' => true,
        )),
      )),
    )),
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
);