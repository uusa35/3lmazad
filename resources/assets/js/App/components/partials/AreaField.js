/**
 * Created by usamaahmed on 5/21/17.
 */
import React , { Component } from 'react';


export default class AreaField extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        console.log(this.props.areas);
        return (
            <div className="ui floating dropdown area labeled icon button search-dropdown search-dropdown-area"
                 id="area">
                <input name="area" id="area_input" value="0" type="hidden"/>
                <i className="marker icon"></i>
                <span className="text">{`trans('general.filter_by_area')`}</span>
                <div className="menu">
                    <div className="scrolling menu">
                        {
                            this.props.areas.map(function(e) {
                                return (
                                    <div className="item area_type" data-text={e.name_ar} data-value={e.id}>
                                        <div className="ui empty circular label"></div>
                                        {e.name_ar}
                                    </div>
                                );
                            })
                        }
                    </div>
                </div>
            </div>
        );
    }
}