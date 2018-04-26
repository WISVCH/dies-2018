const fs = require('fs');
const path = require('path');
const glob = require('glob');

const cwd = path.resolve(process.cwd(), 'images');
const images = {};

for (const imageFile of glob.sync('**/*', {cwd})) {
  const day = path.dirname(imageFile);

  if (day === '.' || day === "committee") {
    continue;
  }
  
  images[day] = images[day] || [];
  
  images[day].push(imageFile);
}

fs.writeFileSync('image-map.json', JSON.stringify(images));
