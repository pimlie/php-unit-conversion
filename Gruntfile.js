module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
  });
  
  // Quickly generate all SI prefixed units
  grunt.registerTask('default', function() {
    var siPrefixes = [
     { factor: '-24', symbol: 'y',  label: 'yocto' },
     { factor: '-21', symbol: 'z',  label: 'zepto' },
     { factor: '-18', symbol: 'a',  label: 'atto' },
     { factor: '-15', symbol: 'f',  label: 'femto' },
     { factor: '-12', symbol: 'p',  label: 'pico' },
     { factor: '-9',  symbol: 'n',  label: 'nano' },
     { factor: '-6',  symbol: 'μ',  label: 'micro' },
     { factor: '-3',  symbol: 'm',  label: 'milli' },
     { factor: '-2',  symbol: 'c',  label: 'centi' },
     { factor: '-1',  symbol: 'd',  label: 'deci' },
     { factor: '1',   symbol: 'da', label: 'deca' },
     { factor: '2',   symbol: 'h',  label: 'hecto' },
     { factor: '3',   symbol: 'k',  label: 'kilo' },
     { factor: '6',   symbol: 'M',  label: 'mega' },
     { factor: '9',   symbol: 'G',  label: 'giga' },
     { factor: '12',  symbol: 'T',  label: 'tera' },
     { factor: '15',  symbol: 'P',  label: 'peta' },
     { factor: '18',  symbol: 'E',  label: 'exa' },
     { factor: '21',  symbol: 'Z',  label: 'zetta' },
     { factor: '24',  symbol: 'Y',  label: 'yotta' },
    ];
    var unitFolder = 'src/Unit/',
        fileExt = '.php',
        baseUnits = {},
        units = [
            { unit: 'Mass',   base: 1, relative: 0, symbol: 'g', label: 'gram', prefix: '' }, 
            { unit: 'Length', base: 1, relative: 0, symbol: 'm', label: 'meter', prefix: '' }, 
            { unit: 'Area',   base: 1, relative: 0, symbol: 'm', label: 'meter', prefix: 'Square' },
            { unit: 'Volume', base: 1, relative: 0, symbol: 'm', label: 'meter', prefix: 'Cubic' },
            { unit: 'Volume', base: 1, relative: 1, symbol: 'l', label: 'liter', prefix: '' },
            { unit: 'Amount', base: 1, relative: 1, symbol: 'mol', label: 'mole', prefix: '' },
         ];
    phpTemplate = `<?php
namespace PhpUnitConversion\\Unit\\<%= unit %>;

use PhpUnitConversion\\System\\Metric;
<%= extraIncludes %>
class <%= baseUnitPrefix %><%= prefixSI %><%= baseUnit %> extends <%= baseUnitPrefix %><%= baseUnit %> implements Metric
{
<%= extraUses %>    const FACTOR = <%= factor %>;

    const SYMBOL = '<%= symbol %>';
    const LABEL = '<%= label %>';
}
`;
    var baseRegex = /BASE_UNIT\s*=\s*([^:]+)::/,
        replaceExt = new RegExp(fileExt);

    for (var u = 0; u < units.length; u++) {
      var baseUnitPrefix = units[u].prefix,
          baseUnit = units[u].label.replace(/\b./g, function(m){ return m.toUpperCase(); })

      if(baseUnit) {
        for (var i = 0; i < siPrefixes.length; i++) {
          siPrefix = siPrefixes[i]
          var prefixSI = siPrefix.label.replace(/\b./g, function(m){ return m.toUpperCase(); }),
              phpFileName = unitFolder + units[u].unit + '/' + baseUnitPrefix + prefixSI + baseUnit + fileExt,
              factor = units[u].base + 'E' + siPrefix.factor * (baseUnitPrefix === 'Cubic' ? 3 : (baseUnitPrefix === 'Square' ? 2 : 1)),
              symbol = siPrefix.symbol + units[u].symbol + (baseUnitPrefix === 'Cubic' ? '3' : (baseUnitPrefix === 'Square' ? '2' : '')),
              label = (baseUnitPrefix ? baseUnitPrefix.toLowerCase() + ' ' : '') + siPrefix.label + units[u].label;

          extraIncludes = ''
          extraUses = ''
          if (units[u].relative) {
            extraIncludes = 'use PhpUnitConversion\\Traits\\HasRelativeFactor;\n';
            extraUses = '    use HasRelativeFactor;\n\n';
          }

          if(units[u].force || !grunt.file.exists(phpFileName)) {
            console.log(phpFileName);
            grunt.file.write(phpFileName, 
              grunt.template.process(phpTemplate, { data: { 
                  unit: units[u].unit,
                  factor: factor,
                  symbol: symbol,
                  label: label,
                  extraIncludes: extraIncludes,
                  extraUses: extraUses,
                  prefixSI: prefixSI,
                  baseUnit: baseUnit,
                  baseUnitPrefix: baseUnitPrefix
                }})
            );
          }
        }
      }
    }
  });
};
