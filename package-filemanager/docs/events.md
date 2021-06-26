## List of events
 * Foostart\Filemanager\Events\ImageIsUploading
 * Foostart\Filemanager\Events\ImageWasUploaded
 * Foostart\Filemanager\Events\ImageIsRenaming
 * Foostart\Filemanager\Events\ImageWasRenamed
 * Foostart\Filemanager\Events\ImageIsDeleting
 * Foostart\Filemanager\Events\ImageWasDeleted
 * Foostart\Filemanager\Events\FolderIsRenaming
 * Foostart\Filemanager\Events\FolderWasRenamed
 * Foostart\Filemanager\Events\ImageIsResizing
 * Foostart\Filemanager\Events\ImageWasResized
 * Foostart\Filemanager\Events\ImageIsCropping
 * Foostart\Filemanager\Events\ImageWasCropped


## How to use
 * Sample code : [package-filemanager-demo-events](https://github.com/foostart/package-filemanager-demo-events)
 * To use events you can add a listener to listen to the events.

    Snippet for `EventServiceProvider`

    ```php
    protected $listen = [
        ImageWasUploaded::class => [
            UploadListener::class,
        ],
    ];
    ```

    The `UploadListener` will look like:

    ```php
    class UploadListener
    {
        public function handle($event)
        {
            $method = 'on'.class_basename($event);
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $event);
            }
        }

        public function onImageWasUploaded(ImageWasUploaded $event)
        {
            $path = $event->path();
            //your code, for example resizing and cropping
        }
    }
    ```

 * Or by using Event Subscribers

    Snippet for `EventServiceProvider`

    ```php
    protected $subscribe = [
        UploadListener::class
    ];
    ```

    The `UploadListener` will look like:

    ```php
    public function subscribe($events)
    {
        $events->listen('*', UploadListener::class);
    }

    public function handle($event)
    {
        $method = 'on'.class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }

    public function onImageWasUploaded(ImageWasUploaded $event)
    {
        $path = $event->path();
        // your code, for example resizing and cropping
    }

    public function onImageWasRenamed(ImageWasRenamed $event)
    {
        // image was renamed
    }

    public function onImageWasDeleted(ImageWasDeleted $event)
    {
        // image was deleted
    }

    public function onFolderWasRenamed(FolderWasRenamed $event)
    {
        // folder was renamed
    }
    ```
