<?php declare(strict_types = 1);

return array (
  '8d34b72d4bc45bfc00e5a5090db49ceb' => 
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
               'className' => 'App\\Entity\\ArticleComment',
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
               'className' => 'App\\Entity\\ArticleComment',
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
             'className' => 'App\\Entity\\ArticleComment',
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
             'className' => 'App\\Entity\\ArticleComment',
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
  '284086deeb3eee2deee131a295917fe8' => 
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
      'article' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\Article',
        )),
         'isVariadic' => false,
      )),
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
  '2dbeab911dc319042a499c457af6c0d6' => 
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
      'article' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\Article',
        )),
         'isVariadic' => false,
      )),
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\IntegerType::__set_state(array(
      )),
    )),
     'throwsTag' => 
    PHPStan\PhpDoc\Tag\ThrowsTag::__set_state(array(
       'type' => 
      PHPStan\Type\ObjectType::__set_state(array(
         'className' => 'Doctrine\\ORM\\NonUniqueResultException',
      )),
    )),
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
);