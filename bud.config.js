/** @param {import('@roots/bud').Bud} bud */
export default async (bud) => {
  bud
    .entry('app', ['resources/js/app.js', 'resources/css/app.css'])
    .setPath('@resources', '@src/resources/')
    .setPath('@dist', '@src/public')
    .watch(bud.path(`@src/resources/**/*`))
}
