const fs = require('fs');
const path = require('path');
const glob = require('glob');

const cwd = path.resolve(process.cwd(), 'images');
const images = {};
const exclude_folders = ["committee"];

for (const imageFile of glob.sync('**/*', {cwd})) {
  const day = path.dirname(imageFile);

  if (day === '.' || exclude_folders.indexOf(day) > -1) {
    continue;
  }
  
  images[day] = images[day] || [];
  
  images[day].push(imageFile);
}

fs.writeFileSync('image-map.json', JSON.stringify(images));
