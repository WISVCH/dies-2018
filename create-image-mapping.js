var fs = require("fs");
const path = require("path");

const root = path.resolve(process.cwd(), "images");

function createMapping() {
  // read all folders
  var res = [];
  fs.readdirSync(root, function(err, subfolders) {
    if (err) {
      console.log("error in reading directory");
      return;
    }

    // for each subfolder
    subfolders.forEach(function(folder) {
      if (err) {
        console.log("error in reading directory");
        return;
      }

      // if it is a directry
      if (!folder.includes(".")) {
        // console.log(root + path.sep + folder);
        fs.readdirSync(root + path.sep + folder, function(err, filenames) {
            
            filenames.forEach( function(filename) {
                console.log("written file: " + filename);
                res.push(filename);
            });
        });
      }
    });
  });

  fs.writeFileSync('image-map.json', JSON.stringify(res), (err) => {
    if (err) throw err;
    console.log('The file has been saved!');
  });
}

createMapping();
