<?php declare(strict_types = 1);

return array (
  '54a9e37ec62daa1b63a6241bca1356f7' => 
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
               'className' => 'App\\Entity\\Article',
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
               'className' => 'App\\Entity\\Article',
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
             'className' => 'App\\Entity\\Article',
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
             'className' => 'App\\Entity\\Article',
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
  '8b3535c5fd589454db257435974d0c1c' => 
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
  '331775290b2003e5f8b2eac482433800' => 
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
  '8da46ef5ac6b9a81c469338ee9b088aa' => 
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
      'user' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\User',
        )),
         'isVariadic' => false,
      )),
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
  '2b29136a804229737dcc4cc55ad9a52b' => 
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
      'limit' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\IntegerType::__set_state(array(
        )),
         'isVariadic' => false,
      )),
    ),
     'returnTag' => 
    PHPStan\PhpDoc\Tag\ReturnTag::__set_state(array(
       'type' => 
      PHPStan\Type\MixedType::__set_state(array(
         'isExplicitMixed' => true,
      )),
    )),
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  '0540b8047f56dd137723d39236a7fd70' => 
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
      PHPStan\Type\IntegerType::__set_state(array(
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
  '29e0c7ab5f7c93bbea3142897156fd32' => 
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
      'limit' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\IntegerType::__set_state(array(
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
  '89946b5c117306784e67bf580e7d4f26' => 
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
      'category' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\Category',
        )),
         'isVariadic' => false,
      )),
      'limit' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\IntegerType::__set_state(array(
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
  'd83e6d789ae50a4936a71e24fc6d2ac4' => 
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
      'category' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\Category',
        )),
         'isVariadic' => false,
      )),
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
  'f361f7899b82c753ced422c4ddac3255' => 
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
             'className' => 'App\\Entity\\Article',
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
  '16dc814940679fc4f51426e865aab0fe' => 
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
      'date' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'DateTimeInterface',
        )),
         'isVariadic' => false,
      )),
      'limit' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\IntegerType::__set_state(array(
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
  '1e51623de8b192337d9da2f4739ac43a' => 
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
      'tag' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\Tag',
        )),
         'isVariadic' => false,
      )),
      'limit' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\IntegerType::__set_state(array(
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
  'ab6d5c258e9ebef8a6bed4b960e5c391' => 
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
      'tag' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Entity\\Tag',
        )),
         'isVariadic' => false,
      )),
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
);