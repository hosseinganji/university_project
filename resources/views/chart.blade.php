
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/annotations/popup.css">
    </head>
    <body>

        <div class="chart-wrapper">
            <div class="highcharts-popup highcharts-popup-indicators">
              <span class="highcharts-close-popup">×</span>
              <div class="highcharts-popup-wrapper">
                <label for="indicator-list">Indicator</label>
                <select name="indicator-list">
                  <option value="sma">SMA</option>
                  <option value="ema">EMA</option>
                  <option value="bb">Bollinger bands</option>
                </select>
                <label for="stroke">Period</label>
                <input type="text" name="period" value="14"/>
              </div>
              <button>Add</button>
            </div>
            <div class="highcharts-popup highcharts-popup-annotations">
              <span class="highcharts-close-popup">×</span>
              <div class="highcharts-popup-wrapper">
                <label for="stroke">Color</label>
                <input type="text" name="stroke" />
                <label for="stroke-width">Width</label>
                <input type="text" name="stroke-width" />
              </div>
              <button>Save</button>
            </div>
            <div class="highcharts-stocktools-wrapper highcharts-bindings-container highcharts-bindings-wrapper">
              <div class="highcharts-menu-wrapper">
                <ul class="highcharts-stocktools-toolbar stocktools-toolbar">
                  <li class="highcharts-indicators" title="Indicators">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Indicators</span>
                  </li>
                  <li class="highcharts-label-annotation" title="Simple shapes">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Shapes</span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-label-annotation" title="Label">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Label</span>
                      </li>
                      <li class="highcharts-circle-annotation" title="Circle">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Circle</span>
                      </li>
                      <li class="highcharts-rectangle-annotation " title="Rectangle">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Rectangle</span>
                      </li>
                      <li class="highcharts-ellipse-annotation" title="Ellipse">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Ellipse</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-segment" title="Lines">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Lines</span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-segment" title="Segment">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Segment</span>
                      </li>
                      <li class="highcharts-arrow-segment" title="Arrow segment">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Arrow segment</span>
                      </li>
                      <li class="highcharts-ray" title="Ray">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Ray</span>
                      </li>
                      <li class="highcharts-arrow-ray" title="Arrow ray">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Arrow ray</span>
                      </li>
                      <li class="highcharts-infinity-line" title="Line">
                          <span class="highcharts-menu-item-btn" ></span>
                        <span class="highcharts-menu-item-title">Line</span>
                      </li>
                      <li class="highcharts-arrow-infinity-line" title="Arrow line">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Arrow</span>
                      </li>
                      <li class="highcharts-horizontal-line" title="Horizontal line">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Horizontal</span>
                      </li>
                      <li class="highcharts-vertical-line" title="Vertical line">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Vertical</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-elliott3" title="Crooked lines">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Crooked lines</span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-elliott3" title="Elliott 3 line">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Elliot 3</span>
                      </li>
                      <li class="highcharts-elliott5" title="Elliott 5 line">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Elliot 5</span>
                      </li>
                      <li class="highcharts-crooked3" title="Crooked 3 line">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Crooked 3</span>
                      </li>
                      <li class="highcharts-crooked5" title="Crooked 5 line">
                          <span class="highcharts-menu-item-btn" ></span>
                        <span class="highcharts-menu-item-title">Crooked 5</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-measure-xy" title="Measure">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Measure</span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-measure-xy" title="Measure XY">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Measure XY</span>
                      </li>
                      <li class="highcharts-measure-x" title="Measure X">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Measure X</span>
                      </li>
                      <li class="highcharts-measure-y" title="Measure Y">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Measure Y</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-fibonacci" title="Advanced">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Advanced</span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-fibonacci" title="Fibonacci">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Fibonacci</span>
                      </li>
                      <li class="highcharts-pitchfork" title="Pitchfork">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Pitchfork</span>
                      </li>
                      <li class="highcharts-parallel-channel" title="Parallel channel">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Parallel channel</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-vertical-counter" title="Vertical labels">
                      <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Counters</span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-vertical-counter" title="Vertical counter">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Counter</span>
                      </li>
                      <li class="highcharts-vertical-label" title="Vertical label">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Label</span>
                      </li>
                      <li class="highcharts-vertical-arrow" title="Vertical arrow">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Arrow</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-flag-circlepin" title="Flags">
                    <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Flags</span>
                    <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-flag-circlepin" title="Flag circle">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Circle</span>
                      </li>
                      <li class="highcharts-flag-diamondpin" title="Flag diamond">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Diamond</span>
                      </li>
                      <li class="highcharts-flag-squarepin" title="Flag square">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Square</span>
                      </li>
                      <li class="highcharts-flag-simplepin" title="Flag simple">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Simple</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-series-type-ohlc" title="Type change">
                    <span class="highcharts-menu-item-btn"></span>
                    <span class="highcharts-menu-item-title">Series type</span>
                    <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-series-type-ohlc" title="OHLC">
                        <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">OHLC</span>
                      </li>
                      <li class="highcharts-series-type-line" title="Line">
                        <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Line</span>
                      </li>
                      <li class="highcharts-series-type-candlestick" title="Candlestick">
                        <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Candlestick</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-save-chart right" title="Save chart">
                    <span class="highcharts-menu-item-btn"></span>
                  </li>
                  <li class="highcharts-full-screen right" title="Fullscreen">
                    <span class="highcharts-menu-item-btn"></span>
                  </li>
                  <li class="highcharts-zoom-x right" title="Zoom change">
                      <span class="highcharts-menu-item-btn"></span>
                      <span class="highcharts-submenu-item-arrow highcharts-arrow-right"></span>
                    <ul class="highcharts-submenu-wrapper">
                      <li class="highcharts-zoom-x" title="Zoom X">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Zoom X</span>
                      </li>
                      <li class="highcharts-zoom-y" title="Zoom Y">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Zoom Y</span>
                      </li>
                      <li class="highcharts-zoom-xy" title="Zooom XY">
                          <span class="highcharts-menu-item-btn"></span>
                        <span class="highcharts-menu-item-title">Zoom XY</span>
                      </li>
                    </ul>
                  </li>
                  <li class="highcharts-current-price-indicator right" title="Current Price Indicators">
                    <span class="highcharts-menu-item-btn"></span>
                  </li>
                  <li class="highcharts-toggle-annotations right" title="Toggle annotations">
                    <span class="highcharts-menu-item-btn"></span>
                  </li>
                </ul>
              </div>
            </div>
            <div id="container" class="chart"></div>
          </div>

          <script src="https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js"></script>

          <script src="https://code.highcharts.com/stock/highstock.js"></script>

          <script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script>

          <script src="https://code.highcharts.com/stock/indicators/indicators.js"></script>
          <script src="https://code.highcharts.com/stock/indicators/bollinger-bands.js"></script>
          <script src="https://code.highcharts.com/stock/indicators/ema.js"></script>

          <script src="https://code.highcharts.com/stock/modules/annotations-advanced.js"></script>

          <script src="https://code.highcharts.com/stock/modules/full-screen.js"></script>
          <script src="https://code.highcharts.com/stock/modules/price-indicator.js"></script>
          <script src="https://code.highcharts.com/stock/modules/stock-tools.js"></script>
          <script src="https://code.highcharts.com/modules/accessibility.js"></script>

          <script src="{{asset('js/script.js')}}"></script>

    </body>
</html>

