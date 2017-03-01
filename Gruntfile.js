module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
  });
  
  // Quickly generate all SI prefixed units
  grunt.registerTask('default', function() {
    var siPrefixes = 'src/Prefix/Metric/',
        unitFolder = 'src/Unit/',
        fileExt = '.php',
        baseUnits = {},
        units = {   'Mass' : '', 
                    'Length': '', 
                    'Area': 'Square', 
                    'Volume': 'Cubic',
                };
        phpTemplate = `<?php
namespace PhpMeasurements\\Unit\\<%= unit %>;

use PhpMeasurements\\System\\Metric;
use PhpMeasurements\\Prefix\\Metric\\<%= prefixSI %>;

class <%= baseUnitPrefix %><%= prefixSI %><%= baseUnit %> extends <%= baseUnitPrefix %><%= baseUnit %> implements Metric, <%= prefixSI %>
{
    
}
`;
    var baseRegex = /BASE_UNIT\s*=\s*([^:]+)::/,
        replaceExt = new RegExp(fileExt);

    grunt.file.recurse(siPrefixes, function(abspath, rootdir, subdir, filename) {
        for(var unit in units) {
            var baseUnitPrefix = units[unit];
            
            if(!baseUnits[unit]) {
                var baseContent = grunt.file.read(unitFolder + unit + fileExt),
                    matches = baseRegex.exec(baseContent),
                    baseUnit = matches[1].split('\\').pop();
                
                baseUnit = baseUnit.replace(new RegExp(baseUnitPrefix), '');
                baseUnits[unit] = baseUnit;
            }else{
                baseUnit = baseUnits[unit];
            }
            
            if(baseUnit) {
                var prefixSI = filename.replace(replaceExt, ''),
                    phpFileName = unitFolder + unit + '/' + baseUnitPrefix + prefixSI + baseUnit + fileExt;
                    
                
                if(!grunt.file.exists(phpFileName)) {
                    grunt.file.write(phpFileName, 
                        grunt.template.process(phpTemplate, { data: { unit: unit, prefixSI: prefixSI, baseUnit: baseUnit, baseUnitPrefix: baseUnitPrefix }})
                    );
                }
            }
        }
    });
       
       
        
    
  });
};
