fn main() {
    let colors = [
        "red", "orange", "amber", "yellow", "lime", "green", "emerald", "teal", "cyan", "sky",
        "blue", "indigo", "violet", "purple", "fuchsia", "pink", "rose", "slate", "gray", "zinc",
        "neutral", "stone", "taupe", "mauve", "mist", "olive",
    ];

    let mut buf = "".to_string();

    for color in colors.into_iter() {


        buf += &format!(

            // add your statements here!
            "\n<span hidden class=\"bg-{color}-100 px-2.5 py-0.5 text-{color}-700\"></span>",
        );
    }

    println!("{}", buf);
}
