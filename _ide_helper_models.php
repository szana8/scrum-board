<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models {
    /**
     * App\Models\GitToken
     *
     * @property int $id
     * @property string $name
     * @property string $token
     * @property int $user_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Database\Factories\GitTokenFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken query()
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken whereToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GitToken whereUserId($value)
     */
    class GitToken extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\IssueType
     *
     * @property int $id
     * @property string $name
     * @property string $slug
     * @property string $icon
     * @property string|null $description
     * @property string $color_code
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IssueTypeSchema[] $schemas
     * @property-read int|null $schemas_count
     * @method static \Database\Factories\IssueTypeFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType query()
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereColorCode($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereIcon($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueType whereUpdatedAt($value)
     */
    class IssueType extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\IssueTypeSchema
     *
     * @property int $id
     * @property string $name
     * @property string $description
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Support\Collection $type_ids
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IssueType[] $types
     * @property-read int|null $types_count
     * @method static \Database\Factories\IssueTypeSchemaFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema query()
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|IssueTypeSchema whereUpdatedAt($value)
     */
    class IssueTypeSchema extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Project
     *
     * @property int $id
     * @property string $name
     * @property string $slug
     * @property string|null $description
     * @property string $type
     * @property string|null $icon
     * @property int $owner_id
     * @property int|null $default_assignee_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\User|null $owner
     * @method static \Database\Factories\ProjectFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Project query()
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereDefaultAssigneeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereIcon($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereOwnerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereSlug($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
     */
    class Project extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
     * @property-read int|null $clients_count
     * @property-read string $avatar
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
     * @property-read int|null $tokens_count
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
