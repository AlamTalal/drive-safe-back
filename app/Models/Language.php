<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model {
    use ModelHelper, HasFactory;

    // id, enabled, created_at, updated_at, deleted_at
    // code, name, voice_code, voice_type, voice_name, voice_gender, voice_profile

    protected $table = 'language';
    protected $fillable = ['name', 'code', 'voice_code', 'voice_type', 'voice_name', 'voice_gender', 'voice_profile', 'enabled', 'deleted_at'];
    protected $casts = ['enabled' => 'boolean'];
    
    public function code(string $newCode = null): string {
        $this->code = ($newCode ?? $this->code);
        return (string) $this->code;
    }

    public function name(string $newName = null): string {
        $this->name = ($newName ?? $this->name);
        return (string) $this->name;
    }

    public function voiceCode(string $newVoiceCode = null): string {
        $this->voice_code = ($newVoiceCode ?? $this->voice_code);
        return (string) $this->voice_code;
    }

    public function voiceType(string $newVoiceType = null): string {
        $this->voice_type = ($newVoiceType ?? $this->voice_type);
        return (string) $this->voice_type;
    }

    public function voiceName(string $newVoiceName = null): string {
        $this->voice_name = ($newVoiceName ?? $this->voice_name);
        return (string) $this->voice_name;
    }

    public function voiceGender(string $newVoiceGender = null): string {
        $this->voice_gender = ($newVoiceGender ?? $this->voice_gender);
        return (string) $this->voice_gender;
    }

    public function voiceProfile(string $newVoiceProfile = null): string {
        $this->voice_profile = ($newVoiceProfile ?? $this->voice_profile);
        return (string) $this->voice_profile;
    }
}
