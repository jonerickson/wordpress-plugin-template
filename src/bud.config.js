/** @param {import('@roots/bud').Bud} bud */
export default async (bud) => {
  bud
    .entry('app', ['resources/js/app.js', 'resources/css/app.css'])
    .setPath('@resources', 'resources')
    .setPath('@dist', 'public')
    .watch(bud.path(`@resources/**/*`))
}
