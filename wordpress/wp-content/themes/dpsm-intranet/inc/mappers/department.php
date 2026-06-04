function dpsm_get_department(
int $post_id
): array
{
return [
'id' => $post_id,
'title' => get_the_title($post_id),
];
}