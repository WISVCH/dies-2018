const path = require('path');
const superagent = require('superagent');
const fs = require('fs-extra');
const glob = require('glob');

const root = path.resolve(process.cwd(), 'images');
const optimizedImagesRoot = path.resolve(process.cwd(), 'images-optimized');
const imageOptions = {
  committee: '200x200',
  prepredies: '250,scale-down',
  predies: '250,scale-down',
  monday: '250,scale-down',
  tuesday: '250,scale-down',
  wednesday: '250,scale-down',
  thursday: '250,scale-down'
};

// Optimize images with ImageOptim
// Run with `yarn run build optimize-images`
async function optimizeImages() {
  await new Promise((resolve, reject) => {
    glob('images/**/*.{jpg,jpeg,png,svg}', (err, files) => {
      for (const file of files) {
        const relativeFile = file.substring(file.indexOf('/') + 1);
        fs.ensureDirSync(path.resolve(optimizedImagesRoot, path.dirname(relativeFile)));

        if (path.extname(file) === '.svg') {
          fs.copySync(file, path.resolve(optimizedImagesRoot, relativeFile));
        } else {
          const imageCategory = path.relative(root, file).split(path.sep)[0];
          const options = imageOptions[imageCategory] || 'full';

          superagent.post(`https://im2.io/nddfzrzzpk/${options}`)
            .attach('file', file)
            .end((err, res) =>  {
              console.log(`Finished optimizing ${file}`);
              fs.writeFileSync(path.resolve(optimizedImagesRoot, relativeFile), res.body);
            });
        }
      }
      resolve();
    });
  });
}

optimizeImages();
