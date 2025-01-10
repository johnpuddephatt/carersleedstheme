export function template() {
  return [
    wp.blocks.createBlock('core/post-title', {}),
    wp.blocks.createBlock('core/post-featured-image', {
      align: '',
      lock: {
        move: true,
        remove: true,
      },
    }),
    wp.blocks.createBlock('acf/hero', {
      data: {
        field_hero_background_colour: 'blue-light',
        field_hero_heading: 'My fullwidth',
        field_hero_content: 'Watch him as he goes.',
        field_hero_buttons: '',
        field_hero_image: '',
      },
      align: '',
      mode: 'preview',
      lock: {
        move: true,
        remove: true,
      },
    }),
  ];
}
