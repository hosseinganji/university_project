

(async () => {

    // Load the dataset
    const data = await fetch(
        // 'https://demo-live-data.highcharts.com/aapl-ohlcv.json'
        'http://127.0.0.1:8000/test'

    ).then(response => response.json());

    // split the data set into ohlc and volume

    Highcharts.stockChart('container', {
        yAxis: {
            labels: {
                align: 'left'
            },
        },
        xAxis: {
            labels: {
                formatter: function() {
                    // تبدیل تاریخ میلادی به شمسی
                    return moment(this.value).format('jYYYY/jM/jD');
                }
            }
        },
        tooltip: {
            formatter: function() {
                // تبدیل تاریخ میلادی به شمسی در tooltip
                const date = moment(this.x).format('jYYYY/jM/jD');
                // جدا کردن اعداد با ","
                const value = Highcharts.numberFormat(this.y, 0, '.', ',');
                return `<b>${date}</b><br/>amount: ${value}`;
            }
        },
        navigator: {
            xAxis: {
                labels: {
                    formatter: function() {
                        // تبدیل تاریخ میلادی به شمسی در navigator
                        return moment(this.value).format('jYYYY/jM/jD');
                    }
                }
            }
        },
        navigationBindings: {
            events: {
                selectButton: function (event) {
                    let newClassName = event.button.className + ' ' +
                        'highcharts-active';
                    const topButton = event.button.parentNode.parentNode;

                    if (topButton.classList.contains('right')) {
                        newClassName += ' right';
                    }

                    // If this is a button with sub buttons,
                    // change main icon to the current one:
                    if (!topButton.classList.contains(
                        'highcharts-menu-wrapper'
                    )) {
                        topButton.className = newClassName;
                    }

                    // Store info about active button:
                    this.chart.activeButton = event.button;
                },
                deselectButton: function (event) {
                    event.button.parentNode.parentNode.classList.remove(
                        'highcharts-active'
                    );

                    // Remove info about active button:
                    this.chart.activeButton = null;
                },
                showPopup: function (event) {

                    if (!this.indicatorsPopupContainer) {
                        this.indicatorsPopupContainer = document
                            .getElementsByClassName(
                                'highcharts-popup-indicators'
                            )[0];
                    }

                    if (!this.annotationsPopupContainer) {
                        this.annotationsPopupContainer = document
                            .getElementsByClassName(
                                'highcharts-popup-annotations'
                            )[0];
                    }

                    if (event.formType === 'indicators') {
                        this.indicatorsPopupContainer.style.display = 'block';
                    } else if (event.formType === 'annotation-toolbar') {
                        // If user is still adding an annotation, don't show
                        // popup:
                        if (!this.chart.activeButton) {
                            this.chart.currentAnnotation = event.annotation;
                            this.annotationsPopupContainer.style.display =
                                'block';
                        }
                    }

                },
                closePopup: function () {
                    this.indicatorsPopupContainer.style.display = 'none';
                    this.annotationsPopupContainer.style.display = 'none';
                }
            }
        },
        stockTools: {
            gui: {
                enabled: false
            }
        },
        series: [
         {
            type: 'spline',
            id: 'aapl-volume',
            name: 'Chart',
            data: data,
            // yAxis: 1
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 800
                },
                chartOptions: {
                    rangeSelector: {
                        inputEnabled: false
                    }
                }
            }]
        }
    });
    })();
