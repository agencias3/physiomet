@inject("objType", "\AgenciaS3\Http\Controllers\Site\TypeController")
<?php $types = $objType->getTypes(8); ?>
@include('site.type._list')