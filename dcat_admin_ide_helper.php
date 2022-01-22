<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection step_id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection brief
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection audio
     * @property Grid\Column|Collection video
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection module_id
     * @property Grid\Column|Collection doc_id
     * @property Grid\Column|Collection push
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection banners
     * @property Grid\Column|Collection service_items
     * @property Grid\Column|Collection service_steps
     * @property Grid\Column|Collection examples
     * @property Grid\Column|Collection case_bg
     * @property Grid\Column|Collection knowledge_id
     * @property Grid\Column|Collection tag_id
     * @property Grid\Column|Collection cube_id
     * @property Grid\Column|Collection alias
     * @property Grid\Column|Collection banner
     * @property Grid\Column|Collection video_title
     * @property Grid\Column|Collection video_url
     * @property Grid\Column|Collection video_cover
     * @property Grid\Column|Collection video_brief
     * @property Grid\Column|Collection module_menu_id
     * @property Grid\Column|Collection tab_id
     * @property Grid\Column|Collection theme_id
     * @property Grid\Column|Collection en_name
     * @property Grid\Column|Collection hid
     * @property Grid\Column|Collection cover
     * @property Grid\Column|Collection bg_img
     * @property Grid\Column|Collection bg_color
     * @property Grid\Column|Collection dot_img
     * @property Grid\Column|Collection tags_img
     * @property Grid\Column|Collection questions
     * @property Grid\Column|Collection videos_duration
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection desc
     * @property Grid\Column|Collection tags
     * @property Grid\Column|Collection share_img
     * @property Grid\Column|Collection share_title
     * @property Grid\Column|Collection contact_img
     * @property Grid\Column|Collection tips
     * @property Grid\Column|Collection huoban_logo
     * @property Grid\Column|Collection huoban_title
     * @property Grid\Column|Collection huoban_desc
     * @property Grid\Column|Collection huoban_poster
     * @property Grid\Column|Collection link_id
     * @property Grid\Column|Collection features
     * @property Grid\Column|Collection prictice_title
     * @property Grid\Column|Collection prictice_video_url
     * @property Grid\Column|Collection prictice_video_cover
     * @property Grid\Column|Collection prictice_video_duration
     * @property Grid\Column|Collection prictice_difficult
     * @property Grid\Column|Collection prictice_points
     * @property Grid\Column|Collection cards
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection password_tips
     * @property Grid\Column|Collection weapp_openid
     * @property Grid\Column|Collection weixin_session_key
     *
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection step_id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection brief(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection audio(string $label = null)
     * @method Grid\Column|Collection video(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection module_id(string $label = null)
     * @method Grid\Column|Collection doc_id(string $label = null)
     * @method Grid\Column|Collection push(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection banners(string $label = null)
     * @method Grid\Column|Collection service_items(string $label = null)
     * @method Grid\Column|Collection service_steps(string $label = null)
     * @method Grid\Column|Collection examples(string $label = null)
     * @method Grid\Column|Collection case_bg(string $label = null)
     * @method Grid\Column|Collection knowledge_id(string $label = null)
     * @method Grid\Column|Collection tag_id(string $label = null)
     * @method Grid\Column|Collection cube_id(string $label = null)
     * @method Grid\Column|Collection alias(string $label = null)
     * @method Grid\Column|Collection banner(string $label = null)
     * @method Grid\Column|Collection video_title(string $label = null)
     * @method Grid\Column|Collection video_url(string $label = null)
     * @method Grid\Column|Collection video_cover(string $label = null)
     * @method Grid\Column|Collection video_brief(string $label = null)
     * @method Grid\Column|Collection module_menu_id(string $label = null)
     * @method Grid\Column|Collection tab_id(string $label = null)
     * @method Grid\Column|Collection theme_id(string $label = null)
     * @method Grid\Column|Collection en_name(string $label = null)
     * @method Grid\Column|Collection hid(string $label = null)
     * @method Grid\Column|Collection cover(string $label = null)
     * @method Grid\Column|Collection bg_img(string $label = null)
     * @method Grid\Column|Collection bg_color(string $label = null)
     * @method Grid\Column|Collection dot_img(string $label = null)
     * @method Grid\Column|Collection tags_img(string $label = null)
     * @method Grid\Column|Collection questions(string $label = null)
     * @method Grid\Column|Collection videos_duration(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection desc(string $label = null)
     * @method Grid\Column|Collection tags(string $label = null)
     * @method Grid\Column|Collection share_img(string $label = null)
     * @method Grid\Column|Collection share_title(string $label = null)
     * @method Grid\Column|Collection contact_img(string $label = null)
     * @method Grid\Column|Collection tips(string $label = null)
     * @method Grid\Column|Collection huoban_logo(string $label = null)
     * @method Grid\Column|Collection huoban_title(string $label = null)
     * @method Grid\Column|Collection huoban_desc(string $label = null)
     * @method Grid\Column|Collection huoban_poster(string $label = null)
     * @method Grid\Column|Collection link_id(string $label = null)
     * @method Grid\Column|Collection features(string $label = null)
     * @method Grid\Column|Collection prictice_title(string $label = null)
     * @method Grid\Column|Collection prictice_video_url(string $label = null)
     * @method Grid\Column|Collection prictice_video_cover(string $label = null)
     * @method Grid\Column|Collection prictice_video_duration(string $label = null)
     * @method Grid\Column|Collection prictice_difficult(string $label = null)
     * @method Grid\Column|Collection prictice_points(string $label = null)
     * @method Grid\Column|Collection cards(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection password_tips(string $label = null)
     * @method Grid\Column|Collection weapp_openid(string $label = null)
     * @method Grid\Column|Collection weixin_session_key(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection order
     * @property Show\Field|Collection id
     * @property Show\Field|Collection step_id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection brief
     * @property Show\Field|Collection image
     * @property Show\Field|Collection audio
     * @property Show\Field|Collection video
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection content
     * @property Show\Field|Collection module_id
     * @property Show\Field|Collection doc_id
     * @property Show\Field|Collection push
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection banners
     * @property Show\Field|Collection service_items
     * @property Show\Field|Collection service_steps
     * @property Show\Field|Collection examples
     * @property Show\Field|Collection case_bg
     * @property Show\Field|Collection knowledge_id
     * @property Show\Field|Collection tag_id
     * @property Show\Field|Collection cube_id
     * @property Show\Field|Collection alias
     * @property Show\Field|Collection banner
     * @property Show\Field|Collection video_title
     * @property Show\Field|Collection video_url
     * @property Show\Field|Collection video_cover
     * @property Show\Field|Collection video_brief
     * @property Show\Field|Collection module_menu_id
     * @property Show\Field|Collection tab_id
     * @property Show\Field|Collection theme_id
     * @property Show\Field|Collection en_name
     * @property Show\Field|Collection hid
     * @property Show\Field|Collection cover
     * @property Show\Field|Collection bg_img
     * @property Show\Field|Collection bg_color
     * @property Show\Field|Collection dot_img
     * @property Show\Field|Collection tags_img
     * @property Show\Field|Collection questions
     * @property Show\Field|Collection videos_duration
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection desc
     * @property Show\Field|Collection tags
     * @property Show\Field|Collection share_img
     * @property Show\Field|Collection share_title
     * @property Show\Field|Collection contact_img
     * @property Show\Field|Collection tips
     * @property Show\Field|Collection huoban_logo
     * @property Show\Field|Collection huoban_title
     * @property Show\Field|Collection huoban_desc
     * @property Show\Field|Collection huoban_poster
     * @property Show\Field|Collection link_id
     * @property Show\Field|Collection features
     * @property Show\Field|Collection prictice_title
     * @property Show\Field|Collection prictice_video_url
     * @property Show\Field|Collection prictice_video_cover
     * @property Show\Field|Collection prictice_video_duration
     * @property Show\Field|Collection prictice_difficult
     * @property Show\Field|Collection prictice_points
     * @property Show\Field|Collection cards
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection password_tips
     * @property Show\Field|Collection weapp_openid
     * @property Show\Field|Collection weixin_session_key
     *
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection step_id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection brief(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection audio(string $label = null)
     * @method Show\Field|Collection video(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection module_id(string $label = null)
     * @method Show\Field|Collection doc_id(string $label = null)
     * @method Show\Field|Collection push(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection banners(string $label = null)
     * @method Show\Field|Collection service_items(string $label = null)
     * @method Show\Field|Collection service_steps(string $label = null)
     * @method Show\Field|Collection examples(string $label = null)
     * @method Show\Field|Collection case_bg(string $label = null)
     * @method Show\Field|Collection knowledge_id(string $label = null)
     * @method Show\Field|Collection tag_id(string $label = null)
     * @method Show\Field|Collection cube_id(string $label = null)
     * @method Show\Field|Collection alias(string $label = null)
     * @method Show\Field|Collection banner(string $label = null)
     * @method Show\Field|Collection video_title(string $label = null)
     * @method Show\Field|Collection video_url(string $label = null)
     * @method Show\Field|Collection video_cover(string $label = null)
     * @method Show\Field|Collection video_brief(string $label = null)
     * @method Show\Field|Collection module_menu_id(string $label = null)
     * @method Show\Field|Collection tab_id(string $label = null)
     * @method Show\Field|Collection theme_id(string $label = null)
     * @method Show\Field|Collection en_name(string $label = null)
     * @method Show\Field|Collection hid(string $label = null)
     * @method Show\Field|Collection cover(string $label = null)
     * @method Show\Field|Collection bg_img(string $label = null)
     * @method Show\Field|Collection bg_color(string $label = null)
     * @method Show\Field|Collection dot_img(string $label = null)
     * @method Show\Field|Collection tags_img(string $label = null)
     * @method Show\Field|Collection questions(string $label = null)
     * @method Show\Field|Collection videos_duration(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection desc(string $label = null)
     * @method Show\Field|Collection tags(string $label = null)
     * @method Show\Field|Collection share_img(string $label = null)
     * @method Show\Field|Collection share_title(string $label = null)
     * @method Show\Field|Collection contact_img(string $label = null)
     * @method Show\Field|Collection tips(string $label = null)
     * @method Show\Field|Collection huoban_logo(string $label = null)
     * @method Show\Field|Collection huoban_title(string $label = null)
     * @method Show\Field|Collection huoban_desc(string $label = null)
     * @method Show\Field|Collection huoban_poster(string $label = null)
     * @method Show\Field|Collection link_id(string $label = null)
     * @method Show\Field|Collection features(string $label = null)
     * @method Show\Field|Collection prictice_title(string $label = null)
     * @method Show\Field|Collection prictice_video_url(string $label = null)
     * @method Show\Field|Collection prictice_video_cover(string $label = null)
     * @method Show\Field|Collection prictice_video_duration(string $label = null)
     * @method Show\Field|Collection prictice_difficult(string $label = null)
     * @method Show\Field|Collection prictice_points(string $label = null)
     * @method Show\Field|Collection cards(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection password_tips(string $label = null)
     * @method Show\Field|Collection weapp_openid(string $label = null)
     * @method Show\Field|Collection weixin_session_key(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
