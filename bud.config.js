/** @param {import('@roots/bud').Bud} bud */
export default async bud => {
    bud.entry('app', ['resources/js/app.js', 'resources/css/app.css'])
    bud.setPath('@dist', '@src/public')
    bud.watch(bud.path(`@src/resources/**/*`));
}