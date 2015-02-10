<?php
return array(
	//'配置项'=>'配置值'
	
	'URL_PATHINFO_DEPR'=>'/',
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_NAME'=>'test',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'tb_',
	'DB_DSN'=>'mysql://root:@localhost:3306/test',
	'SHOW_PAGE_TRACE'=>'true',
	'TMPL_PARSE_STRING'=>array(
		'__CSS__'=>__ROOT__.'/Public/css',
		'__JS__'=>__ROOT__.'/Public/js',
		'__BOO__'=>__ROOT__.'/Public/bootstrap',
	),
);
?>