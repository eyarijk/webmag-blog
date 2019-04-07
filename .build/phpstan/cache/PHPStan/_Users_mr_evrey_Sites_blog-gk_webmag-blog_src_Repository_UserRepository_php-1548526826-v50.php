<?php declare(strict_types = 1);

return array (
  '837b8b9f717c56ac75c8085d407233cb' => 
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
               'className' => 'App\\Entity\\User',
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
               'className' => 'App\\Entity\\User',
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
             'className' => 'App\\Entity\\User',
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
             'className' => 'App\\Entity\\User',
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
  '724c6ba3b6d39cfa8dbfcf3d2b2d467b' => 
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
      'registry' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Bridge\\Doctrine\\RegistryInterface',
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
);