"use strict";
var fs = require('fs'),
    path = require('path'),
    _ = require('lodash');

var BANNED = [
    'index.js',
    '*example',
    'package.json',
    '*__'
];

function loadFile(targetDir, encoding) {
  if (!encoding) encoding = "utf-8";
  return fs.readFileSync(targetDir, encoding);
}

/**
 * loadDirectory loads whole directory as an object and exports it from module
 * @param  {String} fileList    List of all files(and directories) from current dir
 * @param  {String} dir         Resolved path from which files will be required
 * @param  {Object} options     Options object
 * - {Regexp} re                Regexp to match for files
 * - {Boolean} recursive        Should it go recursively over all directories
 * - {String} type              File type/extension
 * @return {Object}             Returns a dictionary of all required files.
 */
function loadDirectory(fileList, dir, options) {
    _.remove(fileList, function (item) {
        var found = _.find(BANNED, function (value) {
            if (value[0] === '*') {
                return item.search(value.substring(1)) !== -1;
            }
            return value === item;
        });
        if (found) {
            return item;
        }
    });
    var pending = fileList.length;

    _.forEach(fileList, function (file) {
        var fileDir = dir + '/' + file;
        var stat = fs.lstatSync(fileDir);
        if (stat && stat.isDirectory() && options.recursive) {
            loadDirectory(fs.readdirSync(fileDir), fileDir, options);
        } else {
            if (!_.isNull(file.match(options.re))) {
                var name = file.replace(options.type, '');
                options.results.push({
                    directory: fileDir,
                    name: name
                });
            }
        }
    });

    if (options.results.length >= pending) {
        var resultsMap = {};
        _.forEach(options.results, function (property) {
          if (options.require) {
            resultsMap[property.name] = require(property.directory);
          } else {
            resultsMap[property.name] = loadFile(property.directory);
          }
        });
        if (options.returnDict) return resultsMap;
    }
}


/**
 * prepareFunction prepares request for the directory loading.
 * @param  {String}     destinationDir  Relative path to the directory to load
 * @param  {Options}    required        Options object
 * -       {String}     type            File extension to load
 * -       {String}     currentDir      __dirname
 * -       {Boolean}    recursive      Should it load recursively, or just flat
 * -       {String}     event           Event to emit after loading's finished
 * -       {Boolean}    returnDict      Should loader return hashmap
 * @return {function}   Callbacks helper function, loadDirectory
 */
function prepareFunction(destinationDir, required) {
    if (!required.type) throw "You didn't specify file type/extension!";
    if (!required.currentDir || !destinationDir) {
        throw "You didn't specify directories in loadDirectory!";
    }
    if (_.isUndefined(required.returnDict)) required.returnDict = true;

    var re = new RegExp(".+" + [required.type], "g"),
        dir = path.resolve(required.currentDir, destinationDir),
        fileList = fs.readdirSync(dir);

    return loadDirectory(fileList, dir, {
        type: required.type,
        recursive: required.recursive,
        event: required.event,
        re: re,
        results: [],
        returnDict: required.returnDict,
        require: !_.isUndefined(required.require) ? required.require : true
    });

}
module.exports = prepareFunction;
