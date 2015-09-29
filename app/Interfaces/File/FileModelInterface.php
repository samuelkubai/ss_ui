<?php

namespace App\Interfaces\File;


interface FileModelInterface {

    /**
     * Links to the Main file the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file();

    /**
     * Gets the user that created the file.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user();

    /**
     * Links  to the folder the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder();

    /**
     * Returns the path to the file.
     *
     * @return mixed
     */
    public function path();

    /**
     * Returns the type(extension) of the file.
     *
     * @return mixed
     */
    public function type();
} 