$('#toggle-left-menu').click(function() {
    if ($('#left-menu').hasClass('small-left-menu')) {
        $('#left-menu').removeClass('small-left-menu');
    } else {
        $('#left-menu').addClass('small-left-menu');
    }
    $('#logo').toggleClass('small-left-menu');
    $('#page-container').toggleClass('small-left-menu');
    $('#header .header-left').toggleClass('small-left-menu');

    $('#logo .big-logo').toggle('362');
    $('#logo .small-logo').toggle('362');
    $('#logo').toggleClass('p-0 pl-1');
});

$(document).on('mouseover', '#left-menu.small-left-menu > ul > li', function() {
    if (!$(this).hasClass('has-sub')) {
        var label = $(this).find('span').text();
        var position = $(this).position();
        $('#show-lable').css({
            'top': position.top + 72,
            'left': position.left + 50,
            'opacity': 1,
            'visibility': 'visible'
        });

        $('#show-lable').text(label);
    } else {
        var position = $(this).position();
        $(this).find('ul').addClass('open');

        if ($(this).find('ul').hasClass('open')) {
            const height = 56;
            var count_submenu_li = $(this).find('ul > li').length;
            if (position.top >= 580) {
                var style = {
                    'top': (position.top + 100) - (height * count_submenu_li),
                    'height': height * count_submenu_li + 'px'
                }
                $(this).find('ul.open').css(style);
            } else {
                var style = {
                    'top': position.top + 79,
                    'height': height * count_submenu_li + 'px'
                }

                $(this).find('ul.open').css(style);
            }

        }
    }

});

$(document).on('mouseout', '#left-menu.small-left-menu li a', function(e) {
    $('#show-lable').css({
        'opacity': 0,
        'visibility': 'hidden'
    });
});

$(document).on('mouseout', '#left-menu.small-left-menu li.has-sub', function(e) {
    $(this).find('ul').css({
        'height': 0,
    });
});

$(window).resize(function() {
    windowResize();
});

$(window).on('load', function() {
    windowResize();
});

$('#left-menu li.has-sub > a').click(function() {
    var _this = $(this).parent();

    _this.find('ul').toggleClass('open');
    $(this).closest('li').toggleClass('rotate');

    _this.closest('#left-menu').find('.open').not(_this.find('ul')).removeClass('open');
    _this.closest('#left-menu').find('.rotate').not($(this).closest('li')).removeClass('rotate');
    _this.closest('#left-menu').find('ul').css('height', 0);

    if (_this.find('ul').hasClass('open')) {
        const height = 47;
        var count_submenu_li = _this.find('ul > li').length;
        _this.find('ul').css('height', height * count_submenu_li + 'px');
    }
});


function windowResize() {
    var width = $(window).width();
    if (width <= 992) {
        $('#left-menu').addClass('small-left-menu');
        $('#logo').addClass('small-left-menu p-0 pl-1');
    } else {
        $('#left-menu').removeClass('small-left-menu');
        $('#logo').removeClass('small-left-menu p-0 pl-1');
    }
}

$(function(){
    $('#datepicker').datepicker();
  });


// google chart
google.charts.load('current', {'packages':['line']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = new google.visualization.DataTable();
data.addColumn('number', 'Day');
data.addColumn('number', 'Midwest Commercial');
data.addColumn('number', 'Northeast Commercial');
data.addColumn('number', 'West Commercial');

data.addRows([
  [1,  37.8, 80.8, 41.8],
  [2,  30.9, 69.5, 32.4],
  [3,  25.4,   57, 25.7],
  [4,  11.7, 18.8, 10.5],
  [5,  11.9, 17.6, 10.4],
  [6,   8.8, 13.6,  7.7],
  [7,   7.6, 12.3,  9.6],
  [8,  12.3, 29.2, 10.6],
  [9,  16.9, 42.9, 14.8],
  [10, 12.8, 30.9, 11.6],
  [11,  5.3,  7.9,  4.7],
  [12,  6.6,  8.4,  5.2],
  [13,  4.8,  6.3,  3.6],
  [14,  4.2,  6.2,  3.4]
]);

var options = {
  chart: {
    title: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur',
    subtitle: 'in millions of dollars (USD)'
  },
  axes: {
    x: {
      0: {side: 'top'}
    }
    
  }
  
};
// for responsive
$(window).resize(function(){
  drawChart();
});

var chart = new google.charts.Line(document.getElementById('line_top_x'));

chart.draw(data, google.charts.Line.convertOptions(options));
}

