<?php

namespace App\Rules;

use App\Helper\Common;
use Illuminate\Contracts\Validation\Rule;

class RuleCheckImage implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $width;
    private $height;
    private $ext;
    private $attribute;
    public function __construct()
    {
        //
        $this->ext = collect(['jpg','jpeg','webp']);
        $this->width = collect([300,400,500]);
        $this->height = collect([300,400,500]);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $image = getimagesize($value);
        $width = $image[0];
        $height = $image[1];
        $ext = $value->getClientOriginalExtension();
        if($this->width->contains($width) && $this->height->contains($height) && $this->ext->contains($ext)){
            return true;
        }
        $this->attribute = Common::setAttribute($attribute,$this::class)->getPathAttribute();
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Common::getMessage($this->attribute,Common::getRuleName($this::class));
    }
}
