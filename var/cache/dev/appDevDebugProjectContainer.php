<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXc3ggpl\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXc3ggpl/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerXc3ggpl.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerXc3ggpl\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerXc3ggpl\appDevDebugProjectContainer(array(
    'container.build_hash' => 'Xc3ggpl',
    'container.build_id' => '96831da5',
    'container.build_time' => 1546271138,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerXc3ggpl');
