$('input[name="even_stable_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="even_stable_comment"]')
            .removeClass("d-none")
            .attr("required", "required");

        $('input[name="even_stable_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="even_stable_comment"]')
            .addClass("d-none")
            .removeAttr("required");

        $('input[name="even_stable_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="base_Plates_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="base_Plates_comment"]')
            .removeClass("d-none")
            .attr("required", "required");

        $('input[name="base_Plates_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="base_Plates_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="base_Plates_image"]')
            .addClass("d-none")
            .removeAttr("required", "required");
    }
});

$('input[name="sole_boards_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="sole_boards_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="sole_boards_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="sole_boards_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="sole_boards_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="undermined_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="undermined_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="undermined_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="undermined_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="undermined_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="Plumb_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="Plumb_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="Plumb_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="Plumb_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="Plumb_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="staggered_joints_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="staggered_joints_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="staggered_joints_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="staggered_joints_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="staggered_joints_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="wrong_spacing_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="wrong_spacing_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="wrong_spacing_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="wrong_spacing_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="wrong_spacing_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="damaged_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="damaged_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="damaged_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="damaged_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="damaged_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="trap_boards_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="trap_boards_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="trap_boards_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="trap_boards_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="trap_boards_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="incomplete_boarding_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="incomplete_boarding_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="incomplete_boarding_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="incomplete_boarding_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="incomplete_boarding_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="supports_ties_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="supports_ties_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="supports_ties_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="supports_ties_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="supports_ties_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="insufficient_length_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="insufficient_length_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="insufficient_length_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="insufficient_length_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="insufficient_length_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="missing_loose_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="missing_loose_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="missing_loose_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="missing_loose_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="missing_loose_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="wrong_fittings_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="wrong_fittings_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="wrong_fittings_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="wrong_fittings_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="wrong_fittings_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="not_level_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="not_level_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="not_level_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="not_level_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="not_level_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="joined_same_bays_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="joined_same_bays_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="joined_same_bays_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="joined_same_bays_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="joined_same_bays_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="loose_damaged_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="loose_damaged_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="loose_damaged_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="loose_damaged_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="loose_damaged_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="wrong_height_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="wrong_height_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="wrong_height_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="wrong_height_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="wrong_height_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="some_missing_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="some_missing_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="some_missing_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="some_missing_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="some_missing_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="partially_removed_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="partially_removed_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="partially_removed_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="partially_removed_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="partially_removed_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="loose_damaged_broken_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="loose_damaged_broken_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="loose_damaged_broken_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="loose_damaged_broken_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="loose_damaged_broken_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="loose_damaged_broken_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="loose_damaged_broken_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="loose_damaged_broken_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="loose_damaged_broken_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="loose_damaged_broken_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="GuardRails_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="GuardRails_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="GuardRails_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="GuardRails_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="GuardRails_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="coupling_wrongfitting_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="coupling_wrongfitting_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $("input[name='coupling_wrongfitting_image']").removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="coupling_wrongfitting_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $("input[name='coupling_wrongfitting_image']")
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="coupling_somemissing_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="coupling_somemissing_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="coupling_somemissing_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="coupling_somemissing_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="coupling_somemissing_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="coupling_loosedamaged_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="coupling_loosedamaged_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="coupling_loosedamaged_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="coupling_loosedamaged_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="coupling_loosedamaged_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="bracing_wrongfitting_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="bracing_wrongfitting_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="bracing_wrongfitting_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="bracing_wrongfitting_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="bracing_wrongfitting_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="bracing_somemissing_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="bracing_somemissing_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="bracing_somemissing_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="bracing_somemissing_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="bracing_somemissing_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="bracing_loosedamaged_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="bracing_loosedamaged_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="bracing_loosedamaged_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="bracing_loosedamaged_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="bracing_loosedamaged_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="debrings_somemissing_radio"]').change(function () {
    if ($(this).val() == 2) {
        $('textarea[name="debrings_somemissing_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="debrings_somemissing_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="debrings_somemissing_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="debrings_somemissing_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="other_radio"]').change(function () {
    if ($(this).val() == 1) {
        $('textarea[name="other_comment"]')
            .removeClass("d-none")
            .attr("required", "required");
        $('input[name="other_image"]').removeClass("d-none");
        // .attr("required", "required");
    } else {
        $('textarea[name="other_comment"]')
            .addClass("d-none")
            .removeAttr("required");
        $('input[name="other_image"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="drawings_design"]').change(function () {
    if ($(this).val() == 1) {
        $('textarea[name="drawings_design_desc"]')
            .removeClass("d-none")
            .attr("required", "required");
    } else {
        $('textarea[name="drawings_design_desc"]').removeAttr("required");
    }
});

$('input[name="equipment_materials"]').change(function () {
    if ($(this).val() == 1) {
        $('textarea[name="equipment_materials_desc"]')
            .removeClass("d-none")
            .attr("required", "required");
    } else {
        $('textarea[name="equipment_materials_desc"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="workmanship"]').change(function () {
    if ($(this).val() == 1) {
        $('textarea[name="workmanship_desc"]')
            .removeClass("d-none")
            .attr("required", "required");
    } else {
        $('textarea[name="workmanship_desc"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="loading_limit"]').change(function () {
    if ($(this).val() == 1) {
        $('textarea[name="loading_limit_desc"]')
            .removeClass("d-none")
            .attr("required", "required");
    } else {
        $('textarea[name="loading_limit_desc"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});

$('input[name="drawings_design"]').change(function () {
    if ($(this).val() == 1) {
        $('textarea[name="drawings_design_desc"]')
            .removeClass("d-none")
            .attr("required", "required");
    } else {
        $('textarea[name="drawings_design_desc"]')
            .addClass("d-none")
            .removeAttr("required");
    }
});
