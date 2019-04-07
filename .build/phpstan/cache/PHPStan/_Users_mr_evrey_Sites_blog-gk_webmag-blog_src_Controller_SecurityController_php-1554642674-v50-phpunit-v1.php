<?php declare(strict_types = 1);

return array (
  '7453cc41e4a96b46a6c7e55e50b00825' => 
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
      'authenticationUtils' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Component\\Security\\Http\\Authentication\\AuthenticationUtils',
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
     'throwsTag' => NULL,
     'isDeprecated' => false,
     'isInternal' => false,
     'isFinal' => false,
  )),
  '05d94d359335b3ce67cb7f465845a76a' => 
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
      'passwordEncoder' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Component\\Security\\Core\\Encoder\\UserPasswordEncoderInterface',
        )),
         'isVariadic' => false,
      )),
      'guardHandler' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'Symfony\\Component\\Security\\Guard\\GuardAuthenticatorHandler',
        )),
         'isVariadic' => false,
      )),
      'authenticator' => 
      PHPStan\PhpDoc\Tag\ParamTag::__set_state(array(
         'type' => 
        PHPStan\Type\ObjectType::__set_state(array(
           'className' => 'App\\Security\\LoginFormAuthenticator',
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
             'className' => 'Symfony\\Component\\HttpFoundation\\Response',
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
);