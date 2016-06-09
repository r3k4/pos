
<?php
$root_dir = '/home/web/apps/tkasir/';
$repo = 'git@bitbucket.org:reka2/tkasir.git';
$release_dir = $root_dir.'releases';
$storage_dir = $root_dir.'storage';
$app_dir     = $root_dir.'default';
$release     = 'release_' . date('Ymd_His');
$server      = 'web@man3kediri.sch.id';
?>
@servers(['web' => $server])

@macro('deploy', ['on' => 'web'])
    fetch_repo
    update_environment_variable
    update_storage
    run_composer
    update_permissions
    update_symlinks
@endmacro

@task('fetch_repo')
    [ -d {{ $release_dir }} ] || mkdir {{ $release_dir }};
    cd {{ $release_dir }};
    git clone {{ $repo }} {{ $release }};
@endtask

@task('update_environment_variable')
    cp {{ $root_dir }}/.env {{ $release_dir }}/{{ $release }};
@endtask



@task('run_composer')
    cd {{ $release_dir }}/{{ $release }};
    composer install --prefer-dist;
@endtask

@task('update_storage')
    [ -d {{ $storage_dir }} ] || mkdir {{ $storage_dir }};
    cp -dr {{ $release_dir }}/{{ $release }}/storage/* {{ $storage_dir }}
    rm -rf {{ $release_dir }}/{{ $release }}/storage/
    ln -nfs {{ $storage_dir }} {{ $release_dir }}/{{ $release }};
@endtask

@task('update_permissions')
    cd {{ $release_dir }};
    chgrp -R www-data {{ $release }};
    chmod -R ug+rwx {{ $release }};
@endtask

@task('update_symlinks')
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }};
    chgrp -h www-data {{ $app_dir }};
    chgrp -h www-data {{ $storage_dir }};
    chmod -R 777 {{ $storage_dir }};
@endtask