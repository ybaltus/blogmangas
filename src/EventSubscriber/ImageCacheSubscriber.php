<?php

namespace App\EventSubscriber;

use App\Entity\ImagesManga;
use App\Entity\Manga;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber
{
    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * @var UploaderHelper
     */
    private $uploaderhelper;

    public function __construct(CacheManager $cacheManager, UploaderHelper $uploaderHelper)
    {
        $this->cacheManager = $cacheManager;
        $this->uploaderhelper = $uploaderHelper;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::preUpdate,
            Events::preRemove
        ];
    }

    public function preRemove(LifecycleEventArgs $args )
    {
        if($args->getEntity() instanceof Manga)
        {
            $this->cacheManager->remove($this->uploaderhelper->asset($args->getEntity(), 'imageFile'));
        }elseif ($args->getEntity() instanceof ImagesManga)
        {
            $this->cacheManager->remove($this->uploaderhelper->asset($args->getEntity(), 'imageFile'));
        }else{
            return;
        }
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        if($args->getEntity() instanceof Manga)
        {
            if($args->getEntity()->getImageFile() instanceof UploadedFile)
                $this->cacheManager->remove($this->uploaderhelper->asset($args->getEntity(),'imageFile'));

        }elseif ($args->getEntity() instanceof ImagesManga)
        {
            if($args->getEntity() instanceof UploadedFile)
                $this->cacheManager->remove($this->uploaderhelper->asset($args->getEntity(), 'imageFile'));

        }else{
            return;
        }
    }
}
